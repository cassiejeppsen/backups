#LESS Style Guide

##iFit LESS 101

* Use 2 space indents
* Don't leave trailing whitespace
* Use hyphen delimited class names
* Use multi-line LESS
* Declarations in logical order, generally following when each element appears on the page
* Always include the final semi-colon in a ruleset
* Any measurement that is set to 0 should not have units attached, simply use 0


##Section Titles

Use section titles every time you begin the code for a "new section" within a large less file. The section titles will start with a $ followed by the section name with no spaces. If it is necessary, a description line may be added beneath the title (spaces are fine here). These needs to be enclosed in 2 lines that are made up of a slash and 57 stars. Yes, 57. Please copy and paste section titles so that they are uniform.

THIS IS OK:

```

/*********************************************************

  $Buttons
  a description can go here

*********************************************************/

```

THESE ARE NOT OK:

```

/*********************************************************

  This is the button section

*********************************************************/

```
```

/*------------------------------------*\
    $Buttons
\*------------------------------------*/

```
```

/*--------- Button section ------------*/

```

You get the picture.

##Other Comments
Other comments in the LESS files can simply use the format: `/* Comment */`
Take out unnecessary comments before committing.

##Shorthand

To keep our LESS as concise as possible, do not overuse shorthand. For example, if you only want to remove the margin from the bottom of an element, don't use `margin:0;` use `margin-bottom:0;` The expression `margin:0` is perfectly fine to use if that is what you want, but be explicit in which properties you set.

Take care that you do not inadvertently set or un-set other styles with the use of shorthand.

##Selectors

Selectors need to be short, efficient and portable.

Heavily location-based selectors are very bad. For starters, they decrease class portability. If we have `.sidebar h3 span{}`, we can't move the h3 or the span outside of the sidebar and maintain styling. If this is what you were intending to do, then that is fine. Many times, however, this is unintended, and we end up writing those styles another two or three times.

Selectors which are too long (not in name, but in location) also introduce performance issues; the more checks in a selector (e.g. `.sidebar h3 span` has three checks, `.content ul p a` has four), the more work the browser has to do.

Make sure styles aren’t dependent on location where possible and logical. Also make sure selectors are nice and short (e.g. one class deep), but the class names themselves can be as long as they need to be. A class of `.user-avatar` is much better than `.usr-avt`.

Remember: pick sensible and future-proof class names that will be easy for other developers to understand.


###Over Qualified Selectors
As we just saw, qualified selectors are not what we should be using.

An over-qualified selector is one like `ul.nav li a{}`. As above, we can instantly drop the `ul` and because we know `.nav` is a list, we therefore know that any `a` must be in an `li,` so we can get `ul.nav li a{}` down to just `.nav a{}.`

Of course sometimes you will want to qualify a class with an element (e.g. if you have a generic .error class that needs to look different when applied to different elements (e.g. `.error{ color:red; }` `div.error{ padding:14px; }`)), but generally avoid it where possible.


###Maximizing Selector Performance

Whilst it is true that browsers will only ever keep getting faster at rendering CSS, efficiency is something to keep an eye on. As we start catering to devices with smaller bandwidths, lean, efficient LESS will decrease loading time. Short, unnested selectors, not using the universal (*{}) selector as the key selector, and avoiding more complex CSS3 selectors should help circumvent these problems.

##Selector Intent

<b>Use selectors to target only specifically what you want,</b> don't use blanket styles just because that is the way the page was layed out. It is often best to put a class on the element you explicitly want to style. <a href="http://csswizardry.com/2012/07/shoot-to-kill-css-selector-intent/">CSS Wizardry </a> has a nice example of this:

"Let’s take a specific example with a selector like .header ul{}...

"Let’s imagine that ul is indeed the main navigation for our website. It lives in the header as you might expect and is currently the only ul in there; .header ul{} will work, but it’s not ideal or advisable. It’s not very future proof and certainly not explicit enough. As soon as we add another ul to that header it will adopt the styling of our main nav and the chances are it won’t want to. This means we either have to refactor a lot of code or undo a lot of styling on subsequent uls in that .header to remove the effects of the far reaching selector.

"Your selector’s intent must match that of your reason for styling something; ask yourself ‘am I selecting this because it’s a ul inside of .header or because it is my site’s main nav?’. The answer to this will determine your selector.

"Make sure your key selector is never an element/type selector or object/abstraction class. You never really want to see selectors like .sidebar ul{} or .footer .media{} in our theme stylesheets.

" <b> Be explicit; target the element you want to affect, not its parent. Never assume that markup won’t change. Write selectors that target what you want, not what happens to be there already. </b>"

Of course, there are always exceptions. Sometimes, the most logical thing to do is to use a blanket selector such as li if you want every list on the page to look the same. Bottom line, use your noggin and know when each are appropriate.

##!important
Use !important with caution. Preferably, only use !important when you have a style you know you ALWAYS want to take preference, like .error{ color:red!important }. It is NOT advised to simply use !important reactively to get yourself out of a tight spot. Always try to rework your LESS to fix the problem first. This is where using short selectors and avoiding IDs comes in handy.

##IDs

I'll make a brief statment about IDs here:

Don't use IDs in LESS.!

IDs are more than fine to be used in markup, but only use classes for styling.

#Responsive Guidelines

##Fluid Grid Layout

Here at iFit, we use bootstrap's fluid grid system. It is composed of a 12 unit wide grid. To read more, visit <a href="http://twitter.github.io/bootstrap/scaffolding.html">Bootstrap's Scaffolding. </a>

Please keep the following in mind when using the grid system:

"Grid systems should be thought of as shelves. They contain content but are not content in themselves. You put up your shelves then fill them with your stuff. By setting up our grids separately to our components you can move components around a lot more easily than if they had dimensions applied to them; this makes our front-ends a lot more adaptable and quick to work with.

"You should never apply any styles to a grid item, they are for layout purposes only. Apply styling to content inside a grid item. Never, under any circumstances, apply box-model properties to a grid item."

All spans that you add should be left totally free of widths; they should always remain fluid and their widths should be governed by the bootstrap grid system.

Heights should never be be applied to elements. Heights should only be applied to things that had dimensions before they entered the site (i.e. images and sprites). Never ever set heights on ps, uls, divs, anything. Try accomplishing the desired effect instead by using line-heights. Generally this works just as well and is much more flexible.

##Media Queries

Responsive Bootstrap conveniently comes with built in media queries, so these are what we are going to be using. Here is what is included:
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Label</th>
                <th>Layout width</th>
                <th>Column width</th>
                <th>Gutter width</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Large display</td>
                <td>1200px and up</td>
                <td>70px</td>
                <td>30px</td>
              </tr>
              <tr>
                <td>Default</td>
                <td>980px and up</td>
                <td>60px</td>
                <td>20px</td>
              </tr>
              <tr>
                <td>Portrait tablets</td>
                <td>768px and above</td>
                <td>42px</td>
                <td>20px</td>
              </tr>
              <tr>
                <td>Phones to tablets</td>
                <td>767px and below</td>
                <td class="muted" colspan="2">Fluid columns, no fixed widths</td>
              </tr>
              <tr>
                <td>Phones</td>
                <td>480px and below</td>
                <td class="muted" colspan="2">Fluid columns, no fixed widths</td>
              </tr>
            </tbody>
          </table>

##Font Sizes

Rem is the unit of choice for our fonts. However, rem is not supported in ie8 and below, so we will need to add pixels fallbacks as well.  To keep our LESS clean and simple, we will use this mixin (will be located in shared.less):

```
.font-size(@sizeValue){
  @remValue: (@sizeValue / 10);
  @pxValue: @sizeValue;
  font-size: ~"@{pxValue}px";
  font-size: ~"@{remValue}rem";
}
```

Usage:
```
p {
  .font-size(13);
}
```

This will output a font size of 1.3rem and a fall back of 13px. This mixin is assumes that the root (HTML) element has this style: `html { font-size: 62.5%; } ` Don't ever change that, or the fonts will be going off of base 16 instead of base 10.


##Basic Architecture of Our LESS

bootstrap.less: Don't touch this file. If you need to edit the elements in bootstrap.less, do it in the base.less file. This file contains all of the less taken straight from bootstrap, included the responsive features.

base folder: The base folder contains all of our main assets. Files in this folder would perhaps be heading.less, button.less, navigation.less, dropdown.less, checkbox.less, etc. These files contain any styling changes that we would like to implement from the bootstrap.less file.

icons.less: styling for all icons. Begin each icon class with .icon- followed by the icon name.

shared.less: Contains all mixins and set values.s

modal.less: contains all styles for modals.

page-by-page files: These files contain all of the styles that are page specific. Use as many of the styles from the base folder as possible. Do not modify base elements, such as the H3  tag. For example, instead of using `.equipment h3 {}`, try creating a class called `.equipment-title {}` and add styles to that. For more information, see the Selector Intent section.


