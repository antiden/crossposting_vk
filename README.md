# Crossposting to VKontakte (Curl) with no dependencies

Drupal ˆ9 ˆ10 module for Crossposting content from site to Group Wall

## Description

This is Skeleton structure for easy to use starting your custom crossposting.

For security reason all token saved in Key module. Key module is required.

## Structure

1. Configuration Form in Services
2. By defualt in Content Type, you can add custom logical field `field_crossposting_vk`. This is field, need for Activating checkbox for reposting New node to your channel. In `.module` file, you can edit in line 19, field to your name.
3. This module not posting image, image automatic adding to post from [MetaTag module](https://www.drupal.org/project/metatag). Please fill image field in OpenGraph and Schema.prg:Article fields.

## Author

[coderteam](https://coderteam.ru)

[antiden](https://antiden.ru)
