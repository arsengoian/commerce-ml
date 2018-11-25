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
use CommerceML\Nodes\Document;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{

    public function testGeneral ()
    {
        $contents = file_get_contents('E:\Developer\PHP\CommerceML\tests\XML\to.xml');
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

        $this -> assertEquals(trim("<?xml version=\"1.0\"?>\n<КоммерческаяИнформация ВерсияСхемы=\"2\" ДатаФормирования=\"2007-10-30\"><Документ><Ид>45</Ид><Номер>143</Номер></Документ><Документ><Ид>45</Ид><Номер>143</Номер></Документ></КоммерческаяИнформация>\n"),
            trim($xml));
    }


    public function testParsesStubOk() {
        $stub = "<?xml version=\"1.0\"?>\n<КоммерческаяИнформация ВерсияСхемы=\"2\" ДатаФормирования=\"2007-10-30\"><Документ><Ид>44</Ид><Номер>143</Номер></Документ><Документ><Ид>45</Ид><Номер>143</Номер></Документ><Документ><Ид>46</Ид><Номер>143</Номер></Документ></КоммерческаяИнформация>\n";

        $commerceML = Client::toCommerceML($stub);

        self::assertObjectHasAttribute('none', $commerceML);
    }

}
