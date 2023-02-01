

// Selecting colors from a JList.
import java.awt.*;
import javax.swing.*;
import javax.swing.event.*;


public class ListTest extends JFrame {
	
	   private JList colorList;
	   private Container container;
	 
	   private final String colorNames[] = { "Black", "Blue", "Cyan", 
	      "Dark Gray", "Gray", "Green", "Light Gray", "Magenta",
	      "Orange", "Pink", "Red", "White", "Yellow" };

	   private final Color colors[] = { Color.BLACK, Color.BLUE, Color.CYAN, 
	      Color.DARK_GRAY, Color.GRAY, Color.GREEN, Color.LIGHT_GRAY, 
	      Color.MAGENTA, Color.ORANGE, Color.PINK, Color.RED, Color.WHITE, 
	      Color.YELLOW };

	   // set up GUI
	   public ListTest()
	   {
	      super( "List Test" );

	      // get content pane and set its layout
	      container = getContentPane();
	      container.setLayout( new FlowLayout() );

	      // create a list with items in colorNames array
	      colorList = new JList( colorNames );
	      colorList.setVisibleRowCount( 5 );
	      
	      // do not allow multiple selections
	      colorList.setSelectionMode( ListSelectionModel.SINGLE_SELECTION );

	      // add a JScrollPane containing JList to content pane
	      container.add( new JScrollPane( colorList ) );
	       
	      setSize( 350, 150 );
	      setVisible( true );

	   } // end ListTest constructor

	   public static void main( String args[] )
	   { 
	      ListTest application = new ListTest();
	      application.setDefaultCloseOperation( JFrame.EXIT_ON_CLOSE );
	   }


}
