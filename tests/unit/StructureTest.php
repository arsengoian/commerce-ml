<?php
/**
 * Created by PhpStorm.
 * User: arsen
 * Date: 11/25/2018
 * Time: 5:40 PM
 */

namespace Test;

use CommerceML\Client;
use CommerceML\Constructors\Address;
use CommerceML\Constructors\AddressField;
use CommerceML\Constructors\BaseUnit;
use CommerceML\Constructors\CommercialInformation;
use CommerceML\Constructors\Container;
use CommerceML\Constructors\Counterparty;
use CommerceML\Constructors\Document;
use CommerceML\Constructors\Counterparties;
use CommerceML\Constructors\Product;
use CommerceML\Constructors\Products;
use CommerceML\Constructors\Representative;
use CommerceML\Constructors\RequisiteValue;
use CommerceML\Constructors\RequisiteValues;
use CommerceML\Constructors\Representatives;
use PHPUnit\Framework\TestCase;

class StructureTest extends TestCase
{

    public function orderDocument()
    {
        return new Document(
            '142',
            '42',
            date('Y-m-d'),
            'Заказ товара',
            'Продавец',
            'UAH',
            '30',
            '4000',
            new Counterparties([
                new Counterparty(
                    '19',
                    'Jake',
                    NULL,
                    'User',
                    'Jake Sully',
                    'Sully',
                    'Jake',
                    new Address([
                        new AddressField('Улица', 'Ул. Тестера'),
                        new AddressField('Дом', '7а'),
                        new AddressField('Квартира', '104'),
                    ], '87698'),
                    null,
                    new Representatives([
                        new Representative(
                            new Counterparty('20', 'Jenny', 'Admin')
                        )
                    ])
                )
            ]),
            date('H:i:s'),
            NULL,
            new Products([
                new Product(
                    '192',
                    'Тетріс',
                    '4',
                    new BaseUnit('796', 'Штука', 'PCE', 'шт'),
                    '400',
                    '5',
                    '2000',
                    new RequisiteValues([
                        new RequisiteValue('ВидНоменклатуры', 'Товар')
                    ])
                )
            ]),
            new RequisiteValues([
                new RequisiteValue('Заказ оплачен', TRUE),
                new RequisiteValue('Метод оплаты', 'Наличный расчет'),
                new RequisiteValue('Дата оплаты', '2007-10-16 15:44:44'),
            ])
        );
    }

    public function orderProvider() {
        return [
            [
                new CommercialInformation([
                    $this->orderDocument(),
                ])
            ]
        ];
    }

    public function bitrixOrderProvider()
    {
        return [
            [
                new CommercialInformation([
                    new Container([
                        $this->orderDocument(),
                    ])
                ])
            ]
        ];
    }

    /**
     * @dataProvider orderProvider
     * @param CommercialInformation $info
     */
    public function testValidOrdersStructure(CommercialInformation $info) {
        self::assertTrue(is_object($info));
    }


    /**
     * @dataProvider orderProvider
     * @param CommercialInformation $info
     */
    public function testForeachWorksOnRequisiteValuesInOrder(CommercialInformation $info) {
        $names = [];
        foreach($info -> documents() as $document)
            foreach($document -> requisiteValues() as $value)
                $names[] = $value -> name();
        $this -> assertEquals($names, ['Заказ оплачен', 'Метод оплаты', 'Дата оплаты']);
    }

    /**
     * @dataProvider bitrixOrderProvider
     * @param CommercialInformation $info
     */
    public function testHasContainerTag(CommercialInformation $info)
    {
        $this->assertCount(1, $info->documents());
        $this->assertInstanceOf(Container::class, $info->documents()[0]);

        $stub = iconv('windows-1251', 'utf-8', Client::toString($info));

        $this->assertSame(1, preg_match("/<КоммерческаяИнформация([^>]*)><Контейнер><Документ>/", $stub, $m));
        $this->assertSame(1, preg_match("/<\/Документ><\/Контейнер><\/КоммерческаяИнформация>/", $stub, $m));
    }
}
