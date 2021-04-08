Data objekty slouží k vyřešení getterů na určitou hodnotu

Např 

class PriceValueObject
__contructor($price_value)

->getPriceByDolars()
->getPriceByCents()


V modelu u metody price místo hodnoty vytvořím objekt.

class PriceModel
getPrice() {
    return PriceValueObject($price_value)
}

new Price()->getPrice()->getPriceByDolars()
new Price()->getPrice()->getPriceByCents()
