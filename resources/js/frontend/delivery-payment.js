import axios from "axios";

export const getPayments = (el, delivery_id) => {
    el.querySelector("input[name=delivery_id]").checked = true;
    axios
        .get(`/delivery-payment/${delivery_id}`)
        .then((response) => {
            return response.data;
        })
        .then((data) => {
            document.querySelector("#payments").style.display = "table";
            let payments = document.querySelectorAll(".payment");

            payments.forEach((payment) => {
                payment.style.display = "none";
            });

            payments.forEach((payment) => {
                let payment_id = payment.getAttribute("data-payment-id");
                data.forEach((item) => {
                    console.log(item.payment_id == payment_id);
                    if (item.payment_id == parseInt(payment_id)) {
                        payment.querySelector(".payment-name").innerHTML =
                            item.name;
                        payment.querySelector(".payment-price").innerHTML =
                            item.price;
                        payment.style.display = "table-row";
                    }
                });
            });
        });
};

export const setPayments = (el) => {
    el.querySelector("input[name=payment_id]").checked = true;
};
