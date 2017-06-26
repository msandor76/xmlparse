# Import library

Create a simple data processing library to import products and it's accessories. The library should accept the following XML schema:

`<?xml version="1.0"?>
<Products>
    <Product>
        <Id>123</Id>
        <Name>Supersecret component</Name>
        <RelId>321</RelId>
        <RelId>412</RelId>
        <!-- ... -->
    </Product>
    <Product>
        <Id>321</Id>
        <Name>Something additional</Name>
        <!-- ... -->
    </Product>
    <Product>
        <Id>412</Id>
        <Name>Extra part</Name>
        <!-- ... -->
    </Product>
    <!-- ... -->
</Products>`

The library should have the following features:
* Export a HTML list with product Id, name and the related accessories name. One line should have only one accessory.
* Export the product list and the relation list into a RDBMS database.

Optional features:
* Accept the following CSV format too: id,name,relid1,relid2,relid3;...
* Make a package from this library so one can add (reference) the project easily.
