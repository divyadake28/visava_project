export interface ApiResponse<T> {
  success: boolean;
  message: string;
  language: string;
  data: T;
}