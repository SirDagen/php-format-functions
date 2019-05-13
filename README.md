# php-beautiful-numbers

## 0. __construct ##

*php-beautiful-numbers* is a number format tool that works with different languages. When you call the constructor, you can state the tongue you want to use as well as other options like the accuracy e.g. (see manual in class file).  

```php
$bn = new bnformat\bnformat( ['lang'=>'de'] ); // set output to German 
```


## 1. sinum() – SI numbers ##

Not only in the physics department it is good practice to use the [SI format](https://en.wikipedia.org/wiki/International_System_of_Units) for writing down any number (large or small in particular). This ensures easy readability and only makes the output as precise as necessary (usually 3 digits are the sweet spot.  

```php
echo $bn->sinum( 9.8437291615846E-5, 's' ); // standard accuracy is 3 digits
echo $bn->sinum( 711372, 'B', ['bin'=>true] ); // use binary prefixes (instead of SI) 
echo $bn->sinum( 3657.3480260881, 'm', ['acc'=>2] ); // accuracy = 2 digits 
```

The output looks like this (Deutsch, English):

```html
98,4 µs   = 9.8437291615846E-5 [Sekunde, deutsches Format]
695 KiB   = 711372 [Byte, Binärprefixe]
3,7 km   = 3657.3480260881 [Meter, Genauigkeit: 2 Stellen]
```
```html
98.4 µs   = 9.8437291615846E-5 [second, English format]
695 KiB   = 711372 [byte, binary prefixes]
3.7 km   = 3657.3480260881 [meter, accuracy: 2 digits]
```


## 2.1. tnum() – text numbers ##

In newspapers and other running text it is common practice to note the numbers from 0 to 12 written-out; all other numbers are written as digits. This produces more beautiful and easier to read texts.  

```php
echo "I see " . $bn->tnum( $val ) . " trees on the hill."; // quick and easy 
echo "I see " . $bn->tnum( $val, ['trees', 'one tree'] ) . " on the hill."; // singular distinction
```

When you display large numbers this function automatically rounds to the given accuracy (Deutsch, English):

```html
Ich sehe neun Bäume auf dem Hügel.   (= 9)
Ich sehe 120.000 Bäume auf dem Hügel.   (= 122823) [Genauigkeit: 2 Stellen]
Ich sehe einen Baum auf dem Hügel.   (= 1)
``` 
```html
I see nine trees on the hill.   (= 9)
I see 120,000 trees on the hill.   (= 122823) [accuracy: 2 digits]
I see one tree on the hill.   (= 1)
```

*Ann.: We use an array for the language part so that it is easier to implement* php-beautiful-numbers *in multi-language websites, e.g. tnum($val, $LANG['de']['termin-AKK']) for the German accusative form like ["Termine", "einen Termin"] and tnum($val, $LANG['de']['termin-NOM']) for the nominative ["Termine", "ein Termin"].*

## 2.2. tsyn() – text syntax ##

If you want the perfect use of numbers in running text, you might additionally need tsyn() to distinguish between singular and plural for the correlated verb (e.g. they "stand" vs. it "stands"). 

```php
echo $bn->tnum( $val, ['trees', 'a tree'], ['transform'=>'ucfirst'] ) . " " // start uppercase  
    . $bn->tsyn( $val, ['stand', 'stands'] ) // corresponding syntax
    . " in the market square.";

```

The output looks like this (Deutsch, English):

```html
Ein Baum steht auf dem Marktplatz.
Zwei Bäume stehen auf dem Marktplatz.
15 Bäume stehen auf dem Marktplatz.
```
```html
A tree stands in the market square.
Two trees stand in the market square.
15 trees stand in the market square.
``` 


Have fun!
