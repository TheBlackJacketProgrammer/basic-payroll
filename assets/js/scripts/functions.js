// Format date and time
function dateFormatter(date) {
    const d = new Date(date);
    return new Intl.DateTimeFormat('en-US', {
        month: '2-digit',
        day: '2-digit',
        year: 'numeric',
        hour: '2-digit',
        minute: '2-digit',
        second: '2-digit',
        hour12: true
    }).format(d);
}

// Get today's date (MM/DD/YYYY)
function getDateToday() {
    return new Intl.DateTimeFormat('en-US', {
        month: '2-digit',
        day: '2-digit',
        year: 'numeric'
    }).format(new Date());
}

// Get date in MMDDYYYY format
function getDateFormat() {
    const d = new Date();
    return [
        String(d.getMonth() + 1).padStart(2, '0'),
        String(d.getDate()).padStart(2, '0'),
        d.getFullYear()
    ].join('');
}

// Get Process Id
function getProcessId()
{
  const generatedProcessId = "";
  const dateformat = getDateFormat();
  generatedProcessId = "PYPRID" + dateformat + (Math.floor(Math.random() * 10000) + 1);
  return generatedProcessId;
}