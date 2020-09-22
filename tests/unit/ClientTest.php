<?php
/**
 * Created by PhpStorm.
 * User: arsen
 * Date: 11/25/2018
 * Time: 12:12 AM
 */

namespace Test;


use CommerceML\Client;
use CommerceML\Nodes\CommercialInformation;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{

    public function testGeneral ()
    {
        $contents = file_get_contents(realpath(__DIR__ . '/../XML/to.xml'));
        $commerceML = Client::toCommerceML($contents);
        $string = Client::toString($commerceML);
        $this -> assertEquals($contents, $string);
    }

    public function testEncodesStubOK ()
    {
        $stub = new class extends CommercialInformation {

            function documents (): array
            {
                return [];
            }

            function schemaVersion (): string
            {
                return 2;
            }

            function formationDate (): string
            {
                return '2007-10-30';
            }
        };

        $xml = Client::toString($stub);

        $need = iconv('utf-8', 'windows-1251', trim("<?xml version=\"1.0\" encoding=\"windows-1251\"?>\n<КоммерческаяИнформация ВерсияСхемы=\"2\" ДатаФормирования=\"2007-10-30\"/>\n"));
        $this -> assertEquals($need, trim($xml));
    }


    public function testParsesStubOk() {
        $stub = "<?xml version=\"1.0\"?>\n<КоммерческаяИнформация ВерсияСхемы=\"2\" ДатаФормирования=\"2007-10-30\"><Документ><Ид>44</Ид><Номер>143</Номер></Документ><Документ><Ид>45</Ид><Номер>145</Номер><Сумма>999.99</Сумма></Документ><Документ><Ид>46</Ид><Номер>143</Номер></Документ></КоммерческаяИнформация>\n";

        $commerceML = Client::toCommerceML($stub);

        self::assertObjectHasAttribute('documents', $commerceML);
        self::assertCount(3, $commerceML->documents());

        /** @var \CommerceML\Constructors\Document $document */
        $document = $commerceML->documents()[1];

        self::assertSame('45', $document->id());
        self::assertSame('145', $document->number());
        self::assertSame('999.99', $document->sum());
    }

}
