export interface EventItem {
  id: number;
  title: string;
  title_mr?: string;
  title_en?: string;
  slug: string;
  location?: string;
  location_mr?: string;
  location_en?: string;
  event_date: string;
  short_description?: string;
  short_description_mr?: string;
  short_description_en?: string;
  description: string;
  description_mr?: string;
  description_en?: string;
  image?: string | null;
  price?: number | null;
  status: string;
  created_at?: string;
}