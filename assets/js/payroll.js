// Instantiate Angular JS Module
// var payroll = angular.module("payroll", ["datatables","ngFileUpload"]);
var payroll = angular.module('payroll', ["datatables"]);

// For Partial View Use
payroll.directive('compile', ['$compile', function ($compile) 
{
  return function(scope, element, attrs) 
  {
    scope.$watch(function(scope) 
    {
      return scope.$eval(attrs.compile);
    },function(value)
    {
      element.html(value);
      $compile(element.contents())(scope);
    });
  };
}]);

// For File Uploading
payroll.directive('fileModel', ['$parse', function ($parse) 
{
  return {
    restrict: 'A',
    link: function(scope, element, attrs) 
          {
            var model = $parse(attrs.fileModel);
            var modelSetter = model.assign;
    
            element.bind('change', function() 
            {
              scope.$apply(function() 
              {
                modelSetter(scope, element[0].files[0]);
              });
            });
          }
    };
}]);

// For Export as Excel
payroll.factory('Excel',function($window)
  {
    var uri = 'data:application/vnd.ms-excel;base64,',
        template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>',
        base64 = function(s) {
          return $window.btoa(unescape(encodeURIComponent(s)));
        },
        format = function(s,c) {
          return s.replace(/{(\w+)}/g,function(m,p){
            return c[p];
          })
        };
    return {
      tableToExcel:function(tableId, worksheetName){
        var table = $(tableId),
            ctx = {
              worksheet:worksheetName, 
              table:table.html()
            },
            href = uri + base64(format(template, ctx));
            // return href;
            var link = document.createElement('a');
                link.download = "scorelist" + '.xls';
                link.href = uri + base64(format(template, ctx));
                link.click();
        }
      };
});

