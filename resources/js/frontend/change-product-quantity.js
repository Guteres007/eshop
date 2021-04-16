import axios from "axios";

var changeTimer;
var doneTypingInterval = 600;
export const changeProductQuantity = (element, product_id) => {
    let form = new FormData();
    form.product_id = product_id;
    form.quantity = element.value;
    if (parseInt(element.value) > 0) {
        clearTimeout(changeTimer);
        changeTimer = setTimeout(() => {
            axios.post("/cart-product", { ...form }).then((response) => {
                window.location.href = "/cart";
            });
        }, doneTypingInterval);
    }
};
