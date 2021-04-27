export const productFiltering = () => {
    let queryBuild = "";

    queryBuild += parameterFilter();
    if (queryBuild !== "?") {
        queryBuild += "&" + priceFilter();
    } else {
        queryBuild += priceFilter();
    }

    window.location.href =
        window.location.origin + window.location.pathname + queryBuild;
};

const parameterFilter = () => {
    let parameters = document.querySelectorAll("[type=checkbox]");
    let paramaters_values_array = [];
    parameters.forEach((parameter) => {
        if (parameter.checked) {
            paramaters_values_array.push(parameter.value);
        }
    });
    if (paramaters_values_array.length > 0) {
        return "?filter[parameters]=" + paramaters_values_array.join();
    }
    return "?";
};

const priceFilter = () => {
    let max = document.querySelector(".filter-price__max-value").innerHTML;
    let min = document.querySelector(".filter-price__min-value").innerHTML;

    return `filter[price]=${min}:${max}`;
};

export const productFilteringReset = () => {
    window.location.href = window.location.origin + window.location.pathname;
};
