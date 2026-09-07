export interface EnquiryPayload {
  name: string;
  email: string;
  phone?: string;
  subject?: string;
  message: string;
}

export interface EnquiryResponse {
  id: number;
  name: string;
  email: string;
  phone?: string;
  subject?: string;
  message: string;
  status: string;
  created_at: string;
  updated_at: string;
  whatsapp?: {
    owner_number: string;
    message: string;
    url: string;
  };
}