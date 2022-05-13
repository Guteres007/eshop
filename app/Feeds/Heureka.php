<?php


namespace App\Feeds;




class Heureka extends AbstractFeed
{
    public function exportProducts()
    {
        $products = $this->getProducts();
        ini_set('max_execution_time', 600);
        $shop = new \SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><SHOP></SHOP>');

        foreach ($products as $product) {

                $shopitem = $shop->addChild('SHOPITEM');

                $shopitem->addChild('ITEM_ID', $product->id);
                $shopitem->addChild('ITEMGROUP_ID', htmlspecialchars($product->code));
                $shopitem->addChild('PRODUCTNAME', $product->name);
                $shopitem->addChild('PRODUCT', htmlspecialchars($product->name));
                $shopitem->addChild('DESCRIPTION', '<p>' . htmlspecialchars($product->short_description) . '</p>');
                $shopitem->addChild('URL', $product->url);
                $shopitem->addChild('IMGURL', \URL::to('/') . $product->image);
                $shopitem->addChild('VAT', '21%');

                $shopitem->addChild('PRICE_VAT', $product->price->raw());
                //musí isť do PRODUCTNAME
               // $manufacturer = $product->manufacturers()->first();
                $shopitem->addChild('MANUFACTURER', 'není');

                // IMGURL ALTERNATIVES.
            /*    $product->images()->each(function ($image) use ($shopitem) {
                    $shopitem->addChild('IMGURL_ALTERNATIVE', \URL::to('/') . $image);
                });
               $shopitem->addChild('CATEGORYTEXT', htmlspecialchars($product->getHeurekaCategoryText($lang)));
*/
                //tovar je skladom
                $shopitem->addChild('DELIVERY_DATE', 0);
                $shopitem->addChild('DUES', 0);
                $shopitem->addChild('HEUREKA_CPC', 1.80);
                $shopitem->addChild('EAN', htmlspecialchars($product->code));
        /*
                foreach ($variant->values as $value) {
                    $param = $shopitem->addChild('PARAM');

                    $param->addChild('PARAM_NAME', $value->attribute->name);
                    $param->addChild('VAL', $value->value);
                }


        */
                $delivery = $shopitem->addChild('DELIVERY');
                $delivery->addChild('DELIVERY_ID', 'neni');
                $delivery->addChild('DELIVERY_PRICE', 300);
                $delivery->addChild('DELIVERY_PRICE_COD', 300);
                $shopitem->addChild('ITEMGROUP_ID', htmlspecialchars($product->code));

        }


        $this->xml = $shop->asXml();
    }
}
