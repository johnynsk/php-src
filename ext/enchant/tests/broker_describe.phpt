--TEST--
enchant_broker_describe() function
--CREDITS--
marcosptf - <marcosptf@yahoo.com.br>
--SKIPIF--
<?php
if(!extension_loaded('enchant')) die('skip, enchant not loader');
if(!enchant_broker_init()) die("failed, broker_init failure\n");
?>
--FILE--
<?php
$broker = enchant_broker_init();
$counter = 0;

if($broker) {
    echo("OK\n");
    $provider = enchant_broker_describe($broker);    
    
    if (is_array($provider)) {
        echo("OK\n");
        
        foreach ($provider as $backend) {
	  if ((isset($backend[$counter]['name']) && isset($backend[$counter]['desc']) && isset($backend[$counter]['file']))) {
	      echo("OK\n");
	      
	  } else {    
	      echo("failed, broker describe\n");
	      
	  }
	  $counter++;
        }
        
    } else {
        echo "failed, brocker describe array \n";
    }
    
} else {
    echo("failed, broker_init failure\n");
}
?>
--EXPECT--
OK
OK
OK
