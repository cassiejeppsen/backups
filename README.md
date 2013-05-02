#LESS Style Guide

##Basic Architecture

bootstrap.less: Don't touch this file. If you need to edit the elements in bootstrap.less, do it in the base.less file. This file contains all of the less taken straight from bootstrap, included the responsive features.

base folder: The base folder contains all of our main assets. Files in this folder would perhaps be heading.less, button.less, navigation.less, dropdown.less, checkbox.less, etc. These files contain any styling changes that we would like to implement from the bootstrap.less file.

icons.less: styling for all icons. Begin each icon class with .icon- followed by the icon name.

modal.less: contains all styles for modals.

page-by-page files: These files contain all of the styles that are page specific. Use as many of the styles from the base folder as possible. Do not modify base elements, such as the H3  tag. For example, instead of using .equipment h3 {}, try creating a class called .equipment-title {} and add styles to that. For more information, see the Selector Intent section.

##General

Use 2 space indents
Don't leave trailing whitespace
Use hyphen delimited class names
Use multi-line LESS
Declarations in logical order, generally following when each element appears on the page
Always include the final semi-colon in a ruleset
Any measurement that is set to 0 should not have units attached. Simply use 0. 


##Section Titles

Use section titles every time you begin the code for a "new section" within a large less file. The section titles will start with a $ followed by the section name with no spaces. If it is necessary, a description line may be added beneath the title (spaces are fine here). These needs to be inclosed in 2 lines that are made up of a slash and 57 stars. Yes, 57. Please copy and paste section titles so that they are uniform.

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

To keep our LESS as concise as possible, do not overuse shorthand. For example, if you only want to remove the margin from the bottom of an element, don't use margin:0; use margin-bottom:0; The expression margin:0 is perfectly fine to use if that is what you want, but be explicit in which properties you set.

Take care that you do not inadvertently set or unset other styles with the use of shorthand.

##IDs

I'll make a brief statment about IDs here:

Don't use IDs in LESS.

IDs are more than fine to be used in markup, but only use classes for styling.


##Selectors

Selectors need to be short, efficient and portable.

Heavily location-based selectors are bad. They decrease class portability, introduce performance issues for a number of reasons. For example, take .sidebar h3 span{}. This selector is too location-based and thus we cannot move that span outside of a h3 outside of .sidebar and maintain styling. Similarly, we cannot re-use that span to style other spans on that page, making our LESS repeatitive.

Selectors which are too long also introduce performance issues; the more checks in a selector (e.g. .sidebar h3 span has three checks, .content ul p a has four), the more work the browser has to do.

Make sure styles aren’t dependent on location where possible, and make sure selectors are nice and short.

Selectors as a whole should be kept short (e.g. one class deep) but the class names themselves should be as long as they need to be. A class of .user-avatar is far nicer than .usr-avt.

Remember: classes are neither semantic or insemantic; they are sensible or insensible! Stop stressing about ‘semantic’ class names and pick something sensible and futureproof.


###Over Qualified Selectors
As we saw earlier, qualified selectors are not what we should be using.

An over-qualified selector is one like div.promo. You could probably get the same effect from just using .promo. Of course sometimes you will want to qualify a class with an element (e.g. if you have a generic .error class that needs to look different when applied to different elements (e.g. .error{ color:red; } div.error{ padding:14px; })), but generally avoid it where possible.

Another example of an over-qualified selector might be ul.nav li a{}. As above, we can instantly drop the ul and because we know .nav is a list, we therefore know that any a must be in an li, so we can get ul.nav li a{} down to just .nav a{}.

###Maximizing Selector Performance

Whilst it is true that browsers will only ever keep getting faster at rendering CSS, efficiency is something to keep an eye on. As we start catering to devices with smaller bandwidths, lean, effecient LESS will decrease loading time. Short, unnested selectors, not using the universal (*{}) selector as the key selector, and avoiding more complex CSS3 selectors should help circumvent these problems.

##Selector Intent

<b>Use selectors to target only specifically what you want,</b> don't use blanket styles just because that is the way the page was layed out. It is often best to put a class on the element you explicitly want to style. <a href="http://csswizardry.com/2012/07/shoot-to-kill-css-selector-intent/">CSS Wizardry </a> has a nice example of this:

"Let’s take a specific example with a selector like .header ul{}...

"Let’s imagine that ul is indeed the main navigation for our website. It lives in the header as you might expect and is currently the only ul in there; .header ul{} will work, but it’s not ideal or advisable. It’s not very future proof and certainly not explicit enough. As soon as we add another ul to that header it will adopt the styling of our main nav and the the chances are it won’t want to. This means we either have to refactor a lot of code or undo a lot of styling on su bsequent uls in that .header to remove the effects of the far reaching selector.

"Your selector’s intent must match that of your reason for styling something; ask yourself ‘am I selecting this because it’s a ul inside of .header or because it is my site’s main nav?’. The answer to this will determine your selector.

"Make sure your key selector is never an element/type selector or object/abstraction class. You never really want to see selectors like .sidebar ul{} or .footer .media{} in our theme stylesheets.

" <b> Be explicit; target the element you want to affect, not its parent. Never assume that markup won’t change. Write selectors that target what you want, not what happens to be there already. </b>

Of course, there are always exceptions. Sometimes, the most logical thing to do is to use a blanket selector such as li if you want every list on the page to look the same. Bottom line, use your noggin and know when each are appropriate.

##!important
Use !important with caution. Preferably, only use !important when you have a style you know you ALWAYS want to take preference, like .error{ color:red!important }. It is NOT advised to simply use !important reactively to get yourself out of a tight spot. Always try to rework your LESS to fix the problem first. This is where using short selectors and avoiding IDs comes in handy.


#Responsive Guidelines

##Fixed-Responsive Layout

All components you build should be left totally free of widths; they should always remain fluid and their widths should be governed by a parent/grid system.

Heights should never be be applied to elements. Heights should only be applied to things which had dimensions before they entered the site (i.e. images and sprites). Never ever set heights on ps, uls, divs, anything. You can often achieve the desired effect with line-height which is far more flexible.

Grid systems should be thought of as shelves. They contain content but are not content in themselves. You put up your shelves then fill them with your stuff. By setting up our grids separately to our components you can move components around a lot more easily than if they had dimensions applied to them; this makes our front-ends a lot more adaptable and quick to work with.

You should never apply any styles to a grid item, they are for layout purposes only. Apply styling to content inside a grid item. Never, under any circumstances, apply box-model properties to a grid item.

##Media Queries

##Font Sizes

##Responsive Content




