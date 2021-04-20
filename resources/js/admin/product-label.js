import axios from "axios";
export const productLabel = (event) => {
    event.preventDefault();
    if (event.currentTarget.classList.contains("btn-success")) {
        event.currentTarget.classList.remove("btn-success");
        event.currentTarget.classList.add("btn-danger");

        event.currentTarget
            .querySelector("i")
            .classList.remove("cil-check-circle");
        event.currentTarget.querySelector("i").classList.add("cil-ban");
    } else {
        event.currentTarget.classList.remove("btn-danger");
        event.currentTarget.classList.add("btn-success");
        event.currentTarget.querySelector("i").classList.remove("cil-ban");
        event.currentTarget
            .querySelector("i")
            .classList.add("cil-check-circle");
    }

    axios.get(event.currentTarget.href);
};
