import {useToast} from "vue-toastification";

export default class NotificationService {
    static toast() {
        return useToast();
    }

    static success(message: string) {
        return useToast().success(message);
    }

    static error(message: string) {
        return useToast().error(message);
    }
}
