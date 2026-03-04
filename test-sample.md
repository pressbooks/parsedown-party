# Parsedown Party Test Markdown

This document contains various markdown syntax examples to test the Parsedown Party plugin functionality.

## Headings

### Level 3 Heading

#### Level 4 Heading

##### Level 5 Heading

###### Level 6 Heading

## Text Formatting

This is **bold text** and this is *italic text*. You can also use ***bold italic***.

This is ~~strikethrough text~~ and `inline code`.

## Lists

### Unordered Lists

- Item one
- Item two
  - Nested item 2.1
  - Nested item 2.2
- Item three

### Ordered Lists

1. First item
2. Second item
   1. Nested item 2.1
   2. Nested item 2.2
3. Third item

## Links and Images

[Link text](https://example.com)

[Link with title](https://example.com "Example Site")

Automatic links: <https://example.com>

## Code Blocks

### Inline Code

Use `var x = 5;` for inline code.

### Code Blocks

```php
<?php
function hello($name) {
    return "Hello, " . $name;
}
```

```python
def greet(name):
    return f"Hello, {name}"
```

Indented code block:

    function example() {
        return true;
    }

## Blockquotes

> This is a blockquote
> 
> It can span multiple lines

> Nested blockquote
> 
> > Inner blockquote
> > 
> > More content

## Horizontal Rules

---

***

___

## Tables

| Header 1 | Header 2 | Header 3 |
|----------|----------|----------|
| Cell 1   | Cell 2   | Cell 3   |
| Cell 4   | Cell 5   | Cell 6   |

| Left Aligned | Center Aligned | Right Aligned |
|:-------------|:--------------:|---------------:|
| Left         | Center         | Right          |

## Line Breaks

This is a line.  
This is a new line with two spaces before it.

This is a new paragraph.

## Special Characters

Here are some special characters: © ® ™ € £ ¥

Math symbols: ≤ ≥ ≠ ≈ ± ×

## Emphasis Variations

*emphasis*  
_emphasis_  
**strong**  
__strong__  
***strong emphasis***  
___strong emphasis___

## Lists with Paragraphs

- First item with paragraph

  Additional paragraph in first item

- Second item
- Third item

  More content

## Definition Lists (if supported)

Term 1
: Definition 1

Term 2
: Definition 2a
: Definition 2b

## Footnotes (if supported)

This text has a footnote[^1].

[^1]: This is the footnote content.

## Escaping

\*This won't be italic\*

\[This won't be a link\]

## Mixed Content

Here's a paragraph with **bold**, *italic*, and `code`.

1. Ordered list item
   - Unordered nested item
   - Another nested item
2. Back to ordered

> Quote with **bold** and *italic*
> 
> - Even has lists inside!
> - Second item

## HTML Support (if enabled)

<div style="background: #f0f0f0; padding: 10px;">
Raw HTML content
</div>

## Final Section

This document demonstrates the markdown features supported by Parsedown Party. You can use this file to test your plugin's rendering and verify that all features work as expected.
