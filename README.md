# Falsa

# DOCS ARE NOT UP2DATE - BUT THE CODE WORKS JUST FINE - VIEW CODE FOR DOCUMENTATION - WILL BE UPDATED SHORTLY

Falsa is a faker utility in PHP for creating dummy products and categories for webshops. 

Inspired by [fzaninotto/Faker](https://github.com/fzaninotto/Faker)

## Basic Usage

There are two ways to use Falsa. One is to create a chain of events that depends on each other another is to create a product or category by it self.

To create a chain, simply use: 

`$chain = Falsa\Factory::create('chain');`

Now you can do something like:

`$chain->loop(6)->category()->product()->exec();`

Let's break it down. 

**loop(int $x = 1)**: Takes one parameter and it's the number of times it should run.

**category([string $category = ''])**: Takes non or one parameter, which is the category as a string.

**product()**: Takes non parameters. If a category was provided all the products created will be of that type. If the category was random selected, the product will match the random category the number of times you set it to loop.

**exec()**: This is the last method called in a chain and is used to stop and execute all the data in the chain.

The chain will return a multidimensional array with a dataset to create your products.

## Locales

Right now the only locale is `en_US`, but feel free to add another folder under Providers and call it your language code underscore language, like this: `da_DK` for Danish. Copy all the files from the `en_US` folder and translate all files. You will now be able to pass the locale as the second argument in the `Falsa\Factory::create('chain', 'da_DK');`

## \Providers\en_US\\*.php

All the files under the locale name is php files which return arrays directly. As mentioned above you can create your own files and expand as necessary.