# phpBB 3.2/3.3 Extension - phpBB.de Knowledge Base

This extension adds a knowledge base to your phpBB board, where you can create categories with articles. 
The articles can be created by users with the necessary permissions and t0 
be created by users without the complete permissions, but will only be displayed after approval.

The extension adds a settings menu to phpBB ACP under the extension tab. 


## Install instructions:
1. Download the extension
2. Copy the whole archive content to: /ext/kinerity/knowledgebase
3. Go to your phpBB-Board > Admin Control Panel > Customise > Manage extensions > Knowledge Base: enable

## Update instructions:
1. Go to you phpBB-Board > Admin Control Panel > Customise > Manage extensions > Knowledge Base: disable
2. Delete all files of the extension from /ext/kinerity/knowledgebase
3. Upload all the new files to the same locations
4. Go to you phpBB-Board > Admin Control Panel > Customise > Manage extensions > Knowledge Base: enable
5. Purge the board cache

## Automated Testing

We use automated unit tests to prevent regressions. Check out our travis build below:

master: [![Build Status](https://github.com/Crizz0/knowledgebase/workflows/Tests/badge.svg)](https://github.com/Crizz0/knowledgebase/actions)

## License

[GPLv2](license.txt)