#LESS Style Guide

##Basic Architecture

bootstrap.less: Don't touch this file. If you need to edit the elements in bootstrap.less, do it in the base.less file. This file contains all of the less taken straight from bootstrap, included the responsive features.

base.less: The base.less file includes all of our main assets. This includes headings, buttons, navigation, dropdowns, checkboxes etc. This file contains any styling changes that we would like to implement from the bootstrap.less file. {Should we split this up? so buttns have thier own, etc?}

icons.less: styling for all icons. Begin each icon class with .icon- followed by the icon name.

modal.less: contains all styles for modals.

page-by-page files: These files contain all of the styles that are page specific. Use as many of the styles from the base.less file as possible.

##General

Use 2 space indents
Don't leave trailing whitespace
Use hyphen delimited class names
Use multi-line LESS
Declarations in logical order, generally following when each element appears on the page
Always include the final semi-colon in a ruleset


##Section Titles

Use section titles every time you begin the code for a "new section" within a large less file. The section titles we are going to use will be a section title that starts with a $ followed by the section name with no spaces. If it is necessary, a description line may be added beneath the title, and spaces are fine. These needs to be inclosed in 2 lines that are made up of a slash and 57 stars. Yes, 57. Please copy and paste section titles so that they are uniform.

THIS IS OK:

```javascript

/*********************************************************

  $Buttons
  a description can go here

*********************************************************/

```

THESE ARE NOT OK:

```javascript

/*********************************************************

  This is the button section

*********************************************************/

```
```javascript

/*------------------------------------*\
    $Buttons
\*------------------------------------*/

```
```javascript

/*--------- Button section ------------*/

```

You get the picture.

##Other Comments
Other comments in the LESS files can simply use the format: /* Comment */
Take out unnecessary comments before committing.

##Shorthand

It might be tempting to use declarations like background:red; but in doing so what you are actually saying is ‘I want no image to scroll, aligned top-left, repeating X and Y, and a background colour of red’. Nine times out of ten this won’t cause any issues but that one time it does is annoying enough to warrant not using such shorthand. Instead use background-color:red;.

Similarly, declarations like margin:0; are nice and short, but be explicit. If you actually only really want to affect the margin on the bottom of an element then it is more appropriate to use margin-bottom:0;.

Be explicit in which properties you set and take care to not inadvertently unset others with shorthand. E.g. if you only want to remove the bottom margin on an element then there is no sense in setting all margins to zero with margin:0;.

Shorthand is good, but easily misused.

##IDs

A quick note on IDs in LESS before we dive into selectors in general.

NEVER use IDs in LESS.

They can be used in your markup for JS and fragment identifiers but use only classes for styling. You don’t want to see a single ID in any stylesheets!

Classes come with the benefit of being reusable (even if we don’t want to, we can) and they have a nice, low specificity. Specificity is one of the quickest ways to run into difficulties in projects and keeping it low at all times is imperative. An ID is 255 times more specific than a class, so never ever use them in LESS ever.

##Selectors

Keep selectors short, efficient and portable.

Heavily location-based selectors are bad for a number of reasons. For example, take .sidebar h3 span{}. This selector is too location-based and thus we cannot move that span outside of a h3 outside of .sidebar and maintain styling. Similarly, we cannot re-use that span to style other spans on that page, making our LESS repeatitive.

Selectors which are too long also introduce performance issues; the more checks in a selector (e.g. .sidebar h3 span has three checks, .content ul p a has four), the more work the browser has to do.

Make sure styles aren’t dependent on location where possible, and make sure selectors are nice and short.

Selectors as a whole should be kept short (e.g. one class deep) but the class names themselves should be as long as they need to be. A class of .user-avatar is far nicer than .usr-avt.

Remember: classes are neither semantic or insemantic; they are sensible or insensible! Stop stressing about ‘semantic’ class names and pick something sensible and futureproof.


###Over Qualified Selectors
As discussed above, qualified selectors are bad news.

An over-qualified selector is one like div.promo. You could probably get the same effect from just using .promo. Of course sometimes you will want to qualify a class with an element (e.g. if you have a generic .error class that needs to look different when applied to different elements (e.g. .error{ color:red; } div.error{ padding:14px; })), but generally avoid it where possible.

Another example of an over-qualified selector might be ul.nav li a{}. As above, we can instantly drop the ul and because we know .nav is a list, we therefore know that any a must be in an li, so we can get ul.nav li a{} down to just .nav a{}.

###Maximizing Selector Performance

Whilst it is true that browsers will only ever keep getting faster at rendering CSS, efficiency is something you could do to keep an eye on. Short, unnested selectors, not using the universal (*{}) selector as the key selector, and avoiding more complex CSS3 selectors should help circumvent these problems.

##Selector Intent

Instead of using selectors to drill down the DOM to an element, it is often best to put a class on the element you explicitly want to style. Let’s take a specific example with a selector like .header ul{}…

Let’s imagine that ul is indeed the main navigation for our website. It lives in the header as you might expect and is currently the only ul in there; .header ul{} will work, but it’s not ideal or advisable. It’s not very future proof and certainly not explicit enough. As soon as we add another ul to that header it will adopt the styling of our main nav and the the chances are it won’t want to. This means we either have to refactor a lot of code or undo a lot of styling on subsequent uls in that .header to remove the effects of the far reaching selector.

Your selector’s intent must match that of your reason for styling something; ask yourself ‘am I selecting this because it’s a ul inside of .header or because it is my site’s main nav?’. The answer to this will determine your selector.

Make sure your key selector is never an element/type selector or object/abstraction class. You never really want to see selectors like .sidebar ul{} or .footer .media{} in our theme stylesheets.

Be explicit; target the element you want to affect, not its parent. Never assume that markup won’t change. Write selectors that target what you want, not what happens to be there already.

##!important
It is okay to use !important on helper classes only. To add !important preemptively is fine, e.g. .error{ color:red!important }, as you know you will always want this rule to take precedence.

Using !important reactively, e.g. to get yourself out of nasty specificity situations, is not advised. Rework your CSS and try to combat these issues by refactoring your selectors. Keeping your selectors short and avoiding IDs will help out here massively.



#Responsive Guidelines

##Fixed-Responsive Layout

All components you build should be left totally free of widths; they should always remain fluid and their widths should be governed by a parent/grid system.

Heights should never be be applied to elements. Heights should only be applied to things which had dimensions before they entered the site (i.e. images and sprites). Never ever set heights on ps, uls, divs, anything. You can often achieve the desired effect with line-height which is far more flexible.

Grid systems should be thought of as shelves. They contain content but are not content in themselves. You put up your shelves then fill them with your stuff. By setting up our grids separately to our components you can move components around a lot more easily than if they had dimensions applied to them; this makes our front-ends a lot more adaptable and quick to work with.

You should never apply any styles to a grid item, they are for layout purposes only. Apply styling to content inside a grid item. Never, under any circumstances, apply box-model properties to a grid item.

##Media Queries

##Font Sizes

##Responsive Content




