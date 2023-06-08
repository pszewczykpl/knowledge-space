import {User} from "@/core/types/User";

export interface Product {
    id: number;
    code_toil: string | null;
    group_code: string | null;
    group_name: string | null;
    name: string;
    code: string | null;
    code_owu: string;
    is_subscriptions: number;
    subscription_code: string | null;
    subscription_status: string | null;
    subscription_date_from: string | null;
    subscription_date_to: string | null;
    kind: string;
    type: string;
    partner_name: string | null;
    partner_code: string | null;
    insurer_min_age: number | null;
    insurer_max_age: number | null;
    insured_min_age: number | null;
    insured_max_age: number | null;
    period_of_insurance: number | null;
    premium_type: string;
    system_status: string;
    system_name: string;
    published_at: string;
    is_archived: number;
    created_by?: User | null;
    created_at: Date;
    updated_at?: Date | null;
}
