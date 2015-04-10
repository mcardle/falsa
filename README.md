# Falsa

Falsa is a faker utility in PHP for creating dummy products and categories for webshops. 

Inspired by [fzaninotto/Faker](https://github.com/fzaninotto/Faker)

## Basic Usage

There are two ways to use Falsa. One is to create a chain of events that depends on each other. Another is to create a product, category or brand by it self.

To create a chain, simply use: 

```php
$chain = Falsa\Factory::create('chain');
```

If more languages is created in the Providers folder, you can set the locale as the second parameter in the Factory::create() method.

Now you can do something like:

```php
$chain->loop(6)->category()->brand()->product()->execute();
```

Let's break it down. 

`loop(int $x = 1)`: Takes one parameter and it's the number of times it should run.

`category([string $name = ''])`: Takes none or one parameter, which is the category as a string.

[See all available categories](https://github.com/mcardle/falsa/wiki/Available-categories)

`brand([string $name = ''])`: Takes none or one parameter, which is the brand of the product you are trying to create.

[See all available brands](https://github.com/mcardle/falsa/wiki/Available-brands)

`product()`: Takes none parameters. If a brand was provided all the products created will be of that brand. If the brand was random selected, the product will match the random brand the number of times you set it to loop. If a brand is not set, but a category is, either by specifying or random, the product will match a random brand from that category.

[See all available products](https://github.com/mcardle/falsa/wiki/Available-products)

`execute()`: This is the last method called in a chain and is used to stop and execute all the data in the chain. 

The chain will return a multidimensional array with a dataset to create your products.

You should now be able to loop through it with a for-loop.

To see how the array is build, you could replace the execute method, with debug(). It will show the current array of build item. You can also pass **true** as the first argument and it will die() after displaying the array.

## I don't want to chain!

If your need is a single brand, product or category, then simply create it direcly in the factory, like this.:

`$product = Falsa\Factory::create('product');`

This will return a single string with a product name. This kan be done with all the classes that you include in the Providers/en_US folder.

## Locales

Right now the only locale is `en_US`, but feel free to add another folder under Providers and call it your language code underscore language, like this: `da_DK` for Danish. Copy all the files from the `en_US` folder and translate all files. You will now be able to pass the locale as the second argument in the `Falsa\Factory::create('chain', 'da_DK');`

## \Providers\en_US\\*.php

All the files under the locale name is php files which return arrays directly. As mentioned above you can create your own files and expand as necessary.

## Contributions

Feel free to create pull requests, with more categories, brands and/or products.

## The future

Later on I will try to create an info extension, which includes the product details and a product picture. Any ideas are welcome and I hope you all enjoy the little class.

## License

Falsa is under the MIT license (MIT). See [LICENSE](LICENSE)