export function submitButtonProcess(el: boolean, btn) {
    if(el) {
        btn.value!.disabled = true;
        btn.value.setAttribute("data-kt-indicator", "on");
    } else {
        btn.value?.removeAttribute("data-kt-indicator");
        btn.value!.disabled = false;
    }
}
