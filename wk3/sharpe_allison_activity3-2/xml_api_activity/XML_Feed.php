<?php

/**
 * =====================
 * Name: Allison Sharpe
 * Date: 12-07-15
 * Activity: Intro to Api's (XML & JSON)
 * Class: SSL
 * =====================
 */

header("Content-type:text/xml"); //tells browser contents of page is XML

$xmlfile = "<?xml version='1.0' encoding='UTF-8'?>"; //specifies version of XML
$xmlfile .= "<feeds>"; //begin parent element "feeds"

$xmlfile .= "<feed>"; //first child element "feed"
$xmlfile .= "<from>Allison</from>";
$xmlfile .= "<message>I am creating my own XML file!</message>";
$xmlfile .= "</feed>"; //end first child element "feed"

$xmlfile .= "<feed>"; //second child element "feed"
$xmlfile .= "<from>Daisy</from>";
$xmlfile .= "<message>XML is fun to use.</message>";
$xmlfile .= "</feed>"; //end second child element "feed"

$xmlfile .= "<feed>"; //third child element "feed"
$xmlfile .= "<from>Alice</from>";
$xmlfile .= "<message>XML is super convenient and easy to learn!</message>";
$xmlfile .= "</feed>"; //end third child element "feed"

$xmlfile .= "</feeds>"; //end parent element "feeds"

echo $xmlfile; //echos $xmlfile to the browser

$dom = new DOMDocument("1.0"); //creates new DOMDocument - version '1.0'
$dom->loadXML($xmlfile); //"loadXML" loads files under $xmlfile
$dom->save("myxml.xml"); //saves file and names it "myxml.xml"

?>