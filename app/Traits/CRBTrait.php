<?php

namespace App\Traits;
use Codedredd\LaravelSoa\Facades\LaravelSoa;
use CodeDredd\Soap\Facades\Soap;

trait CRBTrait{
    protected $username;
    protected $password;
    protected $domain;

    public function __construct()
    {
        $this->username = 'ZMFq7NE3vz';
        $this->password = 'RTgPnNeGUcKECD';
        $this->domain = 'https://secure3.crbafrica.com/crbws/zm?wsdl';
    }

    // Using cURL
    public function soapApiCRBRequest($code, $user){
        try {
            $url = 'https://secure3.crbafrica.com/crbws_zm/zm'; // Update with the correct endpoint
            $soapAction = 'http://ws.zm.crbws.transunion.ke.co/getProduct'.$code; // Update with the correct SOAP action

            $xmlPayload = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ws="http://ws.zm.crbws.transunion.ke.co/">
                    <soapenv:Header/>
                    <soapenv:Body>
                        <ws:getProduct104>
                            <!--Optional:-->
                            <!--Optional:-->
                            <username>Ws_Mighty</username>
                            <!--Optional:-->
                            <password>11dI`I5))e2%</password>
                            <!--Optional:-->
                            <code>1267</code>
                            <!--Optional:-->
                            <infinityCode>zm123456789</infinityCode>
                            <!--Optional:-->
                            <name1>'.$user->fname.'</name1>
                            <!--Optional:-->
                            <name2>'.$user->lname.'</name2>
                            <!--Optional:-->
                            <name3>?</name3>
                            <!--Optional:-->
                            <name4>?</name4>
                            <!--Optional:-->
                            <nationalID>'.$user->nrc_no.'</nationalID>
                            <!--Optional:-->
                            <passportNo>?</passportNo>
                            <!--Optional:-->
                            <serviceID>?</serviceID>
                            <!--Optional:-->
                            <alienID>?</alienID>
                            <!--Optional:-->
                            <taxID>?</taxID>
                            <!--Optional:-->

                            <dateOfBirth>'.date('d/m/Y', strtotime($user->dob)).'</dateOfBirth>
                            <!--Optional:-->
                            <postalBoxNo>?</postalBoxNo>
                            <!--Optional:-->
                            <postalTown>?</postalTown>
                            <!--Optional:-->
                            <postalCountry>?</postalCountry>
                            <!--Optional:-->
                            <telephoneWork>?</telephoneWork>
                            <!--Optional:-->
                            <telephoneHome>?</telephoneHome>
                            <!--Optional:-->
                            <telephoneMobile>?</telephoneMobile>
                            <!--Optional:-->
                            <physicalAddress>?</physicalAddress>
                            <!--Optional:-->
                            <physicalTown>?</physicalTown>
                            <!--Optional:-->
                            <physicalCountry>?</physicalCountry>
                            <reportSector>1</reportSector>
                            <reportReason>3</reportReason>
                        </ws:getProduct104>
                    </soapenv:Body>
                </soapenv:Envelope>';
            // dd($xmlPayload);
            $headers = [
                "Content-type: text/xml;charset=\"utf-8\"",
                'Authorization: Basic ' . base64_encode($this->username . ':' . $this->password),
                "Accept: text/xml",
                "Cache-Control: no-cache",
                "Connection: Keep-Alive",
                "Content-Length: " . strlen($xmlPayload), // Calculate content length dynamically
                "Pragma: no-cache",
                "SOAPAction: $soapAction",
                // "Content-length: ".strlen($xmlPayload),
            ];

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_USERPWD, $this->username.":".$this->password.":".$this->domain);
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
            curl_setopt($ch, CURLOPT_TIMEOUT, 10);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $xmlPayload);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            $response = curl_exec($ch);
            if (curl_errno($ch)) {
                // Handle cURL error
                echo 'Error: ' . curl_error($ch);
            }

            curl_close($ch);
            // Process $response as needed (e.g., parse XML, handle SOAP response)
            return $response;
        } catch (\Throwable $th) {
            dd('Hello Greenwebbtech Fix this error: '.$th);
        }
    }


    public function soapApiCRBDemoRequest($code, $user){
        try {
            $url = 'https://secure3.crbafrica.com/crbws_zm/zm'; // Update with the correct endpoint
            $soapAction = 'http://ws.zm.crbws.transunion.ke.co/getProduct104'; // Update with the correct SOAP action

            $xmlPayload = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ws="http://ws.zm.crbws.transunion.ke.co/">
                    <soapenv:Header/>
                    <soapenv:Body>
                        <ws:getProduct104>
                            <!--Optional:-->
                            <!--Optional:-->
                            <username>Ws_Mighty</username>
                            <!--Optional:-->
                            <password>11dI`I5))e2%</password>
                            <!--Optional:-->
                            <code>1267</code>
                            <!--Optional:-->
                            <infinityCode>zm123456789</infinityCode>
                            <!--Optional:-->
                            <name1>'.$user->fname.'</name1>
                            <!--Optional:-->
                            <name2>'.$user->lname.'</name2>
                            <!--Optional:-->
                            <name3>?</name3>
                            <!--Optional:-->
                            <name4>?</name4>
                            <!--Optional:-->
                            <nationalID>'.$user->nrc_no.'</nationalID>
                            <!--Optional:-->
                            <passportNo>?</passportNo>
                            <!--Optional:-->
                            <serviceID>?</serviceID>
                            <!--Optional:-->
                            <alienID>?</alienID>
                            <!--Optional:-->
                            <taxID>?</taxID>
                            <!--Optional:-->

                            <dateOfBirth>'.date('d/m/Y', strtotime($user->dob)).'</dateOfBirth>
                            <!--Optional:-->
                            <postalBoxNo>?</postalBoxNo>
                            <!--Optional:-->
                            <postalTown>?</postalTown>
                            <!--Optional:-->
                            <postalCountry>?</postalCountry>
                            <!--Optional:-->
                            <telephoneWork>?</telephoneWork>
                            <!--Optional:-->
                            <telephoneHome>?</telephoneHome>
                            <!--Optional:-->
                            <telephoneMobile>?</telephoneMobile>
                            <!--Optional:-->
                            <physicalAddress>?</physicalAddress>
                            <!--Optional:-->
                            <physicalTown>?</physicalTown>
                            <!--Optional:-->
                            <physicalCountry>?</physicalCountry>
                            <reportSector>1</reportSector>
                            <reportReason>3</reportReason>
                        </ws:getProduct104>
                    </soapenv:Body>
                </soapenv:Envelope>';
            // dd($xmlPayload);
            $headers = [
                "Content-type: text/xml;charset=\"utf-8\"",
                'Authorization: Basic ' . base64_encode($this->username . ':' . $this->password),
                "Accept: text/xml",
                "Cache-Control: no-cache",
                "Connection: Keep-Alive",
                "Content-Length: " . strlen($xmlPayload), // Calculate content length dynamically
                "Pragma: no-cache",
                "SOAPAction: $soapAction",
                // "Content-length: ".strlen($xmlPayload),
            ];

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_USERPWD, $this->username.":".$this->password.":".$this->domain);
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
            curl_setopt($ch, CURLOPT_TIMEOUT, 10);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $xmlPayload);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            $response = curl_exec($ch);
            if (curl_errno($ch)) {
                // Handle cURL error
                echo 'Error: ' . curl_error($ch);
            }

            curl_close($ch);
            // Process $response as needed (e.g., parse XML, handle SOAP response)
            return $response;
        } catch (\Throwable $th) {
            dd('Hello Greenwebbtech Fix this error: '.$th);
        }
    }
}
