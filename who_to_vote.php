<?php
$doc = new DOMDocument(); $doc->loadHTML(file_get_contents('http://www.bechirot.gov.il/elections19/eng/list/ListIndex_eng.aspx'));
$xpath = new DOMXpath($doc); $elements = $xpath->query('//*[@id=\'ctl00_ContentPlaceHolder1_dlLists\']/tr/td/table/tr/td[2]/a');

// $voters - http://www.knesset.gov.il/elections18/heb/results/main_results.aspx
// 1-34 - http://www.bechirot.gov.il/elections19/heb/list/listindex.aspx
for ($i = 1, $voters = 3373490; $i < $voters; $party = mt_rand(1,33), $i++, @$parties[$party]++) { }
arsort($parties, SORT_NUMERIC); array_walk($parties, function($count, $id) use ($elements) {
    echo "$count => ($id) " . $elements->item($id)->nodeValue . PHP_EOL; 
});
