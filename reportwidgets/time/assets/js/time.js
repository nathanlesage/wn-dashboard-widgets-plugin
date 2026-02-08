function tick () {
  const timeWidget = document.querySelector('#time-widget')

  if (timeWidget === null) {
    return
  }

  const phpTimeZone = timeWidget.dataset.phpTime
  if (!phpTimeZone) {
    return    
  }

  const serverTimeElem = document.querySelector('#server-time')
  const localTimeElem = document.querySelector('#local-time')

  if (!serverTimeElem || !localTimeElem) {
    return
  }

  const { DateTime } = window.luxon

  if (!DateTime) {
    return
  }

  const local = DateTime.now()
  const remote = DateTime.now().setZone(phpTimeZone)

  const format = {
    ...DateTime.DATETIME_FULL_WITH_SECONDS,
    month: 'short'
  }

  localTimeElem.textContent = local.toLocaleString(format)
  serverTimeElem.textContent = remote.toLocaleString(format)

  // Now, serve the message
  const aheadElem = document.querySelector('#server-is-ahead-message')
  const behindElem = document.querySelector('#server-is-behind-message')
  const equalElem = document.querySelector('#server-is-same-message')

  if (!aheadElem || !behindElem || !equalElem) {
    return
  }

  aheadElem.style.display = 'none'
  behindElem.style.display = 'none'
  equalElem.style.display = 'none'

  if (remote.offset > local.offset) {
    // Server is ahead
    aheadElem.style.display = ''
    const infoElem = aheadElem.querySelector('.status-label.primary')
    infoElem.textContent = '+' + (remote.offset - local.offset)
  } else if (remote.offset < local.offset) {
    // Server is behind
    behindElem.style.display = ''
    const infoElem = behindElem.querySelector('.status-label.primary')
    infoElem.textContent = remote.offset - local.offset
  } else {
    // Same timezone
    equalElem.style.display = ''
  }
}

document.addEventListener('DOMContentLoaded', () => {
  setInterval(tick, 1000)
})
