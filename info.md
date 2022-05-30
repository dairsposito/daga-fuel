
# APP INFO

## TODO:

- [x] Create user
    - [x] Validate name
    - [x] Validate email duplicity
    - [x] Validate password integrity
    - [x] Store password using password_hash()

- [ ] Login user
    - [ ] Create Auth class
    - [ ] Auth::login($user)
        - [ ] Validate password using password_verify()
        - [ ] Create session
    - [ ] Auth::isAllowed($userId)
        - [ ] Verify if session_id equals to $userId
    - [ ] Auth::isLogged()
        - [ ] Verify if there is a valid session
    - [ ] Auth::getFullName()
        - [ ] Return the user's full name as named Schiavo, D.
    - [ ] Auth::logou()
        - [ ] Destroy the session

- [ ] User profile page

- [ ] Car's CRUD
- [ ] Fill-ups' CRUD
- [ ] Reports page
    - [ ] Average car's consumption
    - [ ] Car's kilometers traveled
    - [ ] Financial reports

- [ ] Share car with another user
