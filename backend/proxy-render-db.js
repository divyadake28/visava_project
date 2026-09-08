/**
 * Render PostgreSQL Local SSL/SNI Proxy
 * 
 * Why this is needed locally:
 * Render PostgreSQL requires TLS with Server Name Indication (SNI).
 * Older local PHP/libpq versions on Windows do not send SNI during Postgres SSLRequest.
 * 
 * This script runs a local bridge on 127.0.0.1:5433 that connects to Render over TLS with full SNI support.
 * 
 * Usage:
 *   1. node proxy-render-db.js
 *   2. In another terminal: php artisan migrate:fresh --seed
 */

import net from 'net';
import tls from 'tls';

const LOCAL_PORT = 5433;
const REMOTE_HOST = 'dpg-dafeufv40ujc73b16png-a.singapore-postgres.render.com';
const REMOTE_PORT = 5432;

const server = net.createServer((clientSocket) => {
  console.log('[Proxy] Client connected (Local PHP / Artisan)...');

  const remoteSocket = net.createConnection(REMOTE_PORT, REMOTE_HOST, () => {
    // Send SSLRequest to Remote Postgres
    const sslRequest = Buffer.from([0, 0, 0, 8, 4, 210, 22, 47]);
    remoteSocket.write(sslRequest);
  });

  remoteSocket.once('data', (data) => {
    if (data.toString('utf8') === 'S') {
      const tlsSocket = tls.connect({
        socket: remoteSocket,
        servername: REMOTE_HOST,
        rejectUnauthorized: false
      }, () => {
        console.log('[Proxy] TLS established with Render PostgreSQL (SNI active). Tunneling traffic...');
        clientSocket.pipe(tlsSocket);
        tlsSocket.pipe(clientSocket);
      });

      tlsSocket.on('error', (err) => {
        console.error('[Proxy] TLS Error:', err.message);
        clientSocket.destroy();
      });

      clientSocket.on('error', (err) => {
        console.error('[Proxy] Client Error:', err.message);
        tlsSocket.destroy();
      });
    } else {
      console.error('[Proxy] Remote server did not accept SSLRequest:', data);
      clientSocket.destroy();
      remoteSocket.destroy();
    }
  });

  remoteSocket.on('error', (err) => {
    console.error('[Proxy] Remote connection error:', err.message);
    clientSocket.destroy();
  });
});

server.listen(LOCAL_PORT, '127.0.0.1', () => {
  console.log(`=====================================================`);
  console.log(`Render PostgreSQL Local Proxy is active!`);
  console.log(`Listening on: 127.0.0.1:${LOCAL_PORT}`);
  console.log(`Forwarding to: ${REMOTE_HOST}:${REMOTE_PORT}`);
  console.log(`=====================================================`);
});
