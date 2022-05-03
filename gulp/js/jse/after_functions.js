function throttle(func, ms) {
  var isThrottled = false,
    savedArgs,
    savedThis;
  function wrapper() {
    if (isThrottled) {
      savedArgs = arguments;
      savedThis = this;
      return;
    }
    func.apply(this, arguments);
    isThrottled = true;
    setTimeout(function () {
      isThrottled = false;
      if (savedArgs) {
        wrapper.apply(savedThis, savedArgs);
        savedArgs = savedThis = null;
      }
    }, ms);
  }
  return wrapper;
}

/**
 * @param json try : return JSON.parse(json)
 * @param rv catch : return !rv ? null : rv
 */
function saveJSONParse(json, rv) {
  try {
    return JSON.parse(json);
  } catch (e) {
    return !rv ? null : rv;
  }
}

function randID() {
  return "_" + Math.random().toString(36).substr(5, 15);
}
