export interface Package {
  id: number;
  title: string;
  title_mr?: string;
  title_en?: string;
  slug: string;
  duration?: string;
  duration_mr?: string;
  duration_en?: string;
  price: number;
  discounted_price?: number | null;
  short_description?: string;
  short_description_mr?: string;
  short_description_en?: string;
  description: string;
  description_mr?: string;
  description_en?: string;
  featured_image?: string | null;
  inclusions?: string[] | null;
  exclusions?: string[] | null;
  status: string;
  created_at?: string;
}