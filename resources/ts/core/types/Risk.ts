import {User} from "@/core/types/User";

export interface Risk {
    id: number;
    name: string;
    code: string;
    category: string;
    group: number;
    grace_period?: string | null;
    created_by?: User | null;
    created_at: Date;
    updated_at?: Date | null;
}
