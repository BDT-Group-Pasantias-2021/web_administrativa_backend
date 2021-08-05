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

| Function       | URL                                                               |
| -------------- | ----------------------------------------------------------------- |
| insertReaction | action=insertReaction&idComment=&authorReaction=&contentReaction= |
| deleteReaction | ?action=deleteReaction&idReaction=                                |
| createComment  | ?action=createComment&author=&notice=&text=                       |
| editComment    | ?action=editComment&idComment=&author=&text=                      |
| deleteComment  | ?action=deleteComment&idComment=&author=                          |

## Notice Class

| Function         | URL                                                                          |
| ---------------- | ---------------------------------------------------------------------------- |
| createNotice     | ?action=createNotice&title=&header=&text=&category=&channel=&status=&author= |
| editNotice       | ?action=editNotice&id=&title=&header=&text=&category=&channel=&author=       |
| editNoticeStatus | ?action=editNotice&id=&status=                                               |
| deleteNotice     | ?action=deleteNotice&id=&author=                                             |

| Store Procedure          | URL                                             |
| ------------------------ | ----------------------------------------------- |
| generalNoticeSearch      | ?action=generalNoticeSearch&campo=&valor=       |
| searchActiveNotification | ?action=searchActiveNotification&campo=&status= |
| searhNotification        | ?action=searhNotification&title=                |
| textNoticeSearch         | ?action=textNoticeSearch&title=                 |
