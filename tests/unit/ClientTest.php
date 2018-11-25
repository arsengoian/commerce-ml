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

            function document (): array
            {
                return [
                    new class extends Document {

                        public function id ()
                        {
                            return 45;
                        }

                        public function number ()
                        {
                            return 143;
                        }
                    }
                ];
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

        $this -> assertNotFalse(is_string($xml));
    }

}
