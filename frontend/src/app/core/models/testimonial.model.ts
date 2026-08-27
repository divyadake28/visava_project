export interface Testimonial {
  id: number;
  client_name: string;
  client_designation?: string;
  client_designation_mr?: string;
  client_designation_en?: string;
  review: string;
  review_mr?: string;
  review_en?: string;
  rating: number;
  client_image?: string | null;
  status: string;
  created_at?: string;
}