# How To Contribute

Thank you for your interest in becoming a part of the Qaton team. We 
are excited about getting you involved.

If you haven't already, please come find us on Reddit 
([r/Qaton](https://www.reddit.com/r/qaton)). 

Here are some important resources:

	* [Official Qaton Site](http://qaton.virx.net) 
	* [Qaton on GitHub](https://github.com/virxnet/qaton) 

## Testing

Qaton is brand new and we are looking for your help to test it and make 
it better. Only manual testing has been performed at this point.
Automated unit testing as well as benchmarking to substantiate our 
speed claims is necessary. 

## Submitting changes

Please send a [GitHub Pull Request to Qaton](https://github.com/virxnet/qaton/pull/new/master) with a clear list of what you've done (read more about [pull requests](http://help.github.com/pull-requests/)). 
Please follow our coding conventions (below) and make sure all of your commits are atomic (one feature or patch per commit).

Always write a clear log message for your commits. One-line messages 
are fine for small changes, but bigger changes should look like this:

    $ git commit -m "A brief summary of the commit
    > 
    > A paragraph describing what changed and its impact."

## Coding conventions

Start reading our code and the documentation and you'll get the hang of 
it. We optimize for readability and maintainability:

_Note: Your suggestions are welcome to improve our coding conventions. 
Our coding conventions have not yet been finalized yet as the project is 
still brand new. We would like community feedback_

	* We try to keep it as simple, neat and tidy as possible 
	* Please adhere to PSR-4 
	* Comply with Packagist conventions [About Packagist](https://packagist.org/about)
	* Write clear descriptive comments
	* Use camelCase for utility methods/functions only and underscores for controller/model method declarations
	* Never use camelCase for variable names
	* Do not use the closing PHP tag in any controllers or models
	* We indent using tabs not spaces (length equal to 4 spaces)
	* Avoid too much white space (a line or two for separation is sufficient)
	* We avoid logic in views, themes and language files. All that belong in the controllers and models. 
	* We ALWAYS put spaces after list items and method parameters (`[1, 2, 3]`, not `[1,2,3]`), around operators (`x += 1`, not `x+=1`), and around hash arrows.
	* Curly braces come on a new line after the method, function or class declaration
	* Always use absolute paths using resources available through Qaton (no relative paths)
	* Avoid adding new files to the Qaton system unless it's absolutely necessary. We want to keep the project small and tidy.
	* Write comments to describe your methods and varables 
	* There may be places where even we (or others) have accidentially not adhered to these conventions. Please bring such instances to our attention. 
	
Please note that this document is still under construction as well.
Your suggestions are greatly appreciated. 

Thanks,
Antony Peiris, VirX.Net Software Innovations Inc. 
