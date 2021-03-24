<?php
    /**
     * Validation in practice
     * 
     * bool is_string ( mixed var)
     * bool is_numeric ( mixed var) //accepts strings with numeric content
     * bool is_int (mixed var)
     * bool is_float ( mixed var)
     * bool is_array ( mixed var)
     * bool is_object ( mixed var)
     * bool is_resource ( mixed var)
     */

    /*
    THINGS YOU SHOULD BE CHECKING:

    -Mistaken input. User types 1095 rather than 10.95
    -Bad input. User purposefully provides incorrect input in attempt to gain advantage
    -Dangerous input. User innocently enters information that would harm the system
    -Missing input. User provides no input.
    */

    /**
     * Advanced variable validation using CTYPE
     * 
     *  For more specific parsing of character types in a variable, the CTYPE library is available. 
     * If you want to check for particular values inside a variable, and want to do so very fast, 
     * CTYPE is for you. Compared to a test like is_numeric(), the equivalent CTYPE check is about three times faster. 
     * There are eleven CTYPE functions in total, all of which work in the same way as is_numeric(): 
     * you pass a variable in, and get either true or false back.
     * 
     * The eleven prototypes are:
     * 
     * bool ctype_alnum ( string text)
     * bool ctype_alpha ( string text)
     * bool ctype_cntrl ( string text)
     * bool ctype_digit ( string text)
     * bool ctype_graph ( string text)
     * bool ctype_lower ( string text)
     * bool ctype_print ( string text)
     * bool ctype_punct ( string text)
     * bool ctype_space ( string text)
     * bool ctype_upper ( string text)
     * bool ctype_xdigit ( string text)
     */

    /**
     * GENERAL ADvIcE
     * 
     * If you are not using magic quotes (and I'd be amazed if you were!), 
     * always use the function mysqli_real_escape_string() when working with user input destined for databases.
     * 
     * Consider using strip_tags() to make sure people cannot insert rogue HTML into your pages.
     * 
     * Never include() a file using a variable unless you are certain the variable cannot come externally. 
     * While include($var); might look nice on the surface, 
     * it does not take much effort for your users to set $var to be a sensitive file on your system. 
     * Even using include("/path/to/somdir/$var") isn't safe, because $var could include "../" to go to the parent directory.
     * 
     * Always remember that your users might submit no value at all, 
     * in which case you need to check for a variable's existence before you check its value.
     * 
     * Don't assume that client-side validation is enough - 
     * users can easily disable scripting on their machine, 
     * or find other ways around your client-side verification
     * 
     * Remember that users can enter "Elephant" for their age - 
     * don't assume that users entered anything like what you asked them to.
     * 
     * Variable variables and variable functions that rely on user input 
     * should be viewed with extreme caution: 
     * don't give your users any such easy chances to damage your system with bad input.
     */


?>