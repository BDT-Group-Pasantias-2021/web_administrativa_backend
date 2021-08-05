## User Class

| Function       | URL                                                                                                                  |
| -------------- | -------------------------------------------------------------------------------------------------------------------- |
| getRankUser    | ?action=getRankUser&email=&password=                                                                                 |
| passRecovery   | ?action=passRecovery&email=                                                                                          |
| insertUser     | ?action=insertUser&name=&email=&typeDocument=&documentUser=&fechaNac=&phoneUser=&typeUser=password=&confirmPassword= |
| restrictNotice | ?action=restrictNotice&id=                                                                                           |
| changeTypeUser | ?action=changeTypeUser&email=&typeUser=&password=                                                                    |
| changePassword | ?action=changePassword&email=&password=&confirmPassword=&newConfirmPassword=                                         |

## Comment Class

| Function       | URL                                |
| -------------- | ---------------------------------- |
| deleteReaction | ?action=deleteReaction&idReaction= |

## Notice Class

| Function         | URL                                                                          |
| ---------------- | ---------------------------------------------------------------------------- |
| createNotice     | ?action=createNotice&title=&header=&text=&category=&channel=&status=&author= |
| editNotice       | ?action=editNotice&id=&title=&header=&text=&category=&channel=&author=       |
| editNoticeStatus | ?action=editNotice&id=&status=                                               |
| deleteNotice     | ?action=deleteNotice&id=&author=                                             |

| Store Procedure     | URL                                       |
| ------------------- | ----------------------------------------- |
| generalNoticeSearch | ?action=generalNoticeSearch&campo=&valor= |
| searhNotification   | ?action=searhNotification&title=          |
