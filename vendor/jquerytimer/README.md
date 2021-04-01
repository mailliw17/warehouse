# jQuery local individual timer

The timer starts on the first visit page. Date now is remembered by local storage. After its completion, the function_result is initialized.

# Example
```
set_timer($('.block'), [0, 0, 30, 0], function(block) {
    block.html('<h1>time is over</h1>');
});
```

## function parametrs
- block (jq dom elements) - a timer is inserted here.
- time_end (array of 4 numbers: days, hours, minuts, seconds) - amount of time to count down.
- function_result (callback) -  the function is init after the timer expires
