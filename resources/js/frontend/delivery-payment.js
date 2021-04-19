import axios from "axios";

export const getPayments = (el, delivery_id) => {
    //odstranení aktivních
    el.nextElementSibling?.classList.remove("payment-methods__item--active");
    el.previousElementSibling?.classList.remove(
        "payment-methods__item--active"
    );
    //přidání aktivního
    el.classList.add("payment-methods__item--active");
    //stažení dat
    axios
        .get(`/delivery-payment/${delivery_id}`)
        .then((response) => {
            return response.data;
        })
        .then((data) => {
            document.querySelector("#payments").style.display = "block";
            let payments = document.querySelectorAll(".payment");

            payments.forEach((payment) => {
                payment.style.display = "none";
            });

            payments.forEach((payment) => {
                payment.querySelector(
                    "input.input-radio__input"
                ).checked = false;
                let payment_id = payment.getAttribute("data-payment-id");

                data.forEach((item) => {
                    console.log(item.payment_id == payment_id);
                    if (item.payment_id == parseInt(payment_id)) {
                        payment.querySelector(".payment-name").innerHTML =
                            item.name;
                        payment.querySelector(".payment-price").innerHTML =
                            item.price;
                        payment.style.display = "block";
                    }
                });
            });
        });
};
