import { Component } from '@angular/core';
import { RouterOutlet } from '@angular/router';
import { HeaderComponent } from './layout/header/header.component';
import { FooterComponent } from './layout/footer/footer.component';
import { MobileActionBarComponent } from './layout/mobile-action-bar/mobile-action-bar.component';
import { FloatingWhatsappComponent } from './layout/floating-whatsapp/floating-whatsapp.component';

@Component({
  selector: 'app-root',
  standalone: true,
  imports: [RouterOutlet, HeaderComponent, FooterComponent, MobileActionBarComponent, FloatingWhatsappComponent],
  templateUrl: './app.html',
  styleUrl: './app.scss',
})
export class App {}
