import {User} from "@/core/types/User";

export interface Fund {
    id: number;
    name: string;
    code: string;
    type: string;
    currency: string;
    status: string;
    start_date: string | null;
    cancel_date: string | null;
    cancel_reason: string | null;
    created_by?: User | null;
    created_at: Date;
    updated_at?: Date | null;
}
