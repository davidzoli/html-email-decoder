# html-email-decoder

> A tool to decode and view HTML email source code.  
> Good for email developers for reverse engineering or checking source.

## Why this tool?
Many cases the HTML email received with [Quoted-printable](https://en.wikipedia.org/wiki/Quoted-printable) encoding. 
```html
<!DOCTYPE html> <html lang=3D"en" xmlns=3D"http://www.w3.org/1999/xhtml" xm=
lns:o=3D"urn:schemas-microsoft-com:office:office" xmlns:v=3D"urn:schemas-mi=
crosoft-com:vml"> <head> <title></title> <!-- The title tag shows in email =
notifications, like Android 4.4. --> <meta charset=3D"utf-8">
```
This tool is for decode and show the original (quoted_printable_decode) with syntax highlighting and formatting.
```html
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">

<head>
    <title></title> <!-- The title tag shows in email notifications, like Android 4.4. -->
    <meta charset="utf-8">
```

There is an existing Stack Overflow newsletter in the code for demonstrate the features.  
The links won't work in this example as I've removed the track IDs from the links.

## Requirements

- Web server
- PHP

## Usage
Just call the index.php in the browser.  
The tool has 3 view:

### HTML view
This view generates the HTML into a frame.  
The soucre is decoded, the inspector reads it as HTML.

### Code view
This view uses [Ace](https://ace.c9.io) and [JS Beautifier](https://github.com/beautify-web/js-beautify) 
to show the decoded source in a higlighted, beautified format.

### Set source
This page for paste the (encoded) email source and save for the other two views.

### Author

**Zoltan David**

* [github/davidzoli](https://github.com/davidzoli)

### License

Copyright © 2020, [Zoltan David](https://github.com/davidzoli).
Released under the [MIT License](LICENSE).
