import axios from "axios";
export const productSignal = (event) => {
    let url = event.currentTarget.getAttribute("data-url");

    axios.get(url);
};
