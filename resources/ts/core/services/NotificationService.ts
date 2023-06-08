import {useToast} from "vue-toastification";
import Swal from "sweetalert2";

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

    static swal(message: string) {
        return Swal.fire({
            text: message,
            icon: "success",
            buttonsStyling: false,
            confirmButtonText: "OK",
            customClass: {
                confirmButton: "btn fw-bold btn-light-danger",
            },
        })
    }
}
