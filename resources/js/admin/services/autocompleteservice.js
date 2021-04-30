import axios from "axios";
import { autocomplete } from "./../autocomplete";

var parameters_name = [];
var parameters_value = [];

export const fetchParameters = async () => {
    parameters_name = await axios
        .get("/admin/product-parameters-name")
        .then((response) => {
            return response.data;
        });
    parameters_value = await axios
        .get("/admin/product-parameters-value")
        .then((response) => {
            return response.data;
        });

    document.querySelectorAll(".parameters_name").forEach((element) => {
        autocomplete(element, parameters_name);
    });
    document.querySelectorAll(".parameters_value").forEach((element) => {
        autocomplete(element, parameters_value);
    });
};
