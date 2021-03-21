
<html>
     <head>
     </head>
     <body>
          <table>
               @foreach($values as $value) 
               <tr>
                    @foreach($keys as $k)
                    <td>{{ $value[$k] }}</td>
                    @endforeach
               </tr>
               @endforeach
          </table>
     </body>
</html>
