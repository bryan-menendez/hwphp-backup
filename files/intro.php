Files

Once you master the art of working with files, a wider world of PHP web development opens up to you. 
Files aren't as flexible as databases by any means, but they do offer the chance to easily 
and permanently store information across scripts, which makes them popular amongst programmers.

Files, as you can imagine, can store all sorts of information. However, most file formats 
(e.g. picture formats such as PNG and JPEG) are binary, and very difficult and/or impossible to write 
using normal text techniques - in these situations you should use the library designed to cope with each format.

One reminder: if you are using an operating system that uses backslash \ as the path separator 
(e.g. Windows), you need to escape the backslash with another backslash, making \\. 
Alternatively, just use /, because Windows understands that just fine too. 