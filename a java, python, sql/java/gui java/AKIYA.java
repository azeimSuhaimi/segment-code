
// declare import
import java.awt.*;
import javax.swing.*;
import javax.swing.table.DefaultTableModel;

public class AKIYA extends JFrame
{
	//declare the object swing component 
	// declare menu bar component
	private JMenuBar mb;
	private JMenu menu_file,menu_edit,menu_help;
	private JMenuItem M_item_print, M_item_exit, M_item_delete, M_item_selectall;
	
	//declare label componet
	private JLabel lbl_product_id, lbl_product_name, lbl_price,lbl_quantity ;
	private JLabel lbl_amount, lbl_tax, lbl_amount_after_tax;
	
	// declare textfield component 
	private JTextField tf_product_id,tf_price,tf_quantity;
	private JTextField tf_amount,tf_amount_after_gst;
	
	//declare combobox component 
	private JComboBox cbo_product_name;
	
	// declare radiobuttton 
	private JRadioButton rbn_agent, rbn_customer;
	
	//declare checkbox
	private JCheckBox chb_yes, chb_no;
	
	//declare button component
	private JButton btn_calculate, btn_clear,btn_add,btn_exit;
	
	
	private JTable tbldisplay;
	private JScrollPane pane;
	final DefaultTableModel modelTable;
	
	public AKIYA()// create constructor no parameter
	{
		mb = new JMenuBar();// create menu bar 
		add(mb); // add menu bar to frame
		setJMenuBar(mb); // set menu bar to frame to become bar 
		
		menu_file = new JMenu("File"); // create menu file for menu bar 
		menu_edit = new JMenu("Edit");  // create menu edit for menu bar
		menu_help = new JMenu("Help");   // create menu help for menu bar
		
		M_item_print = new JMenuItem("Print"); // create print menu item for menu file
		M_item_exit = new JMenuItem("Exit");  // create exit menu item for menu file
		M_item_delete = new JMenuItem("Delete"); // create delete menu item for menu edit
		M_item_selectall = new JMenuItem("Select All");  // create select all menu item for menu edit
		
		mb.add(menu_file); // add menu file to menu bar
		mb.add(menu_edit); // add menu edit to menu bar
		mb.add(menu_help); // add menu help to menu bar
		
		menu_file.add(M_item_print); // add menu item print to menu file
		menu_file.add(M_item_exit);  // add menu item exit to menu file
		menu_edit.add(M_item_delete); // add menu item edit to menu edit
		menu_edit.add(M_item_selectall);  // add menu item edit to menu edit
		
		JTabbedPane tp = new JTabbedPane(); // create tabbedpane object
		add(tp); // add tabbed pane to frame
		
		JPanel p_stock = new JPanel(); // create panel for tabbedpane
		JPanel p_staf_info = new JPanel(); // create panel for tabbedpane
		
		tp.add("Store",p_stock); // add panel to tabbed pane 
		tp.add("Staf Infomation",p_staf_info); // add panel to tabbed pane 
		
		JPanel p_product_info = new JPanel(); // create panel for group product component 
		
		p_product_info.setBorder(BorderFactory.createTitledBorder("Product Infomation")); // create the border to panel product info

		p_stock.add(p_product_info); // add panel product info to panel tabbed pane stock
		
		//create the label 
		lbl_product_id = new JLabel("Product ID"); // create label product id 
		lbl_product_name = new JLabel("Product Name"); // create label product name 
		lbl_price = new JLabel("Price (RM)"); // create label price 
		lbl_quantity = new JLabel("Quantity"); // create label quantity
		
		tf_product_id = new JTextField(10);
		tf_price = new JTextField(10);
		tf_quantity = new JTextField(10);
		 
		cbo_product_name = new JComboBox();
		
		btn_calculate = new JButton("Calculate Amount");
		
		
		///////////////////////////////////////////////////////////
		JPanel catogary = new JPanel();
		
		rbn_agent = new JRadioButton();
		rbn_customer = new JRadioButton();
		
		ButtonGroup bg = new ButtonGroup();
		bg.add(rbn_agent);
		bg.add(rbn_customer);
		
		
		//////////////////////////////////////////////////////
		
		lbl_amount = new JLabel("Amount");
		lbl_tax = new JLabel("tax (6%)");
		lbl_amount_after_tax = new JLabel("Amount after tax");
		
		tf_amount = new JTextField(2);
		tf_amount_after_gst = new JTextField(2);
		
		ButtonGroup bg2 = new ButtonGroup();
		chb_yes = new JCheckBox("Yes");
		chb_no = new JCheckBox("No");
		
		btn_clear = new JButton("Clear");
		btn_add = new JButton("Add");
		
		
		
		
		//////////////////////////////////////////////////////////////////////
		JPanel p_list_product = new JPanel();
		p_list_product.setBorder(BorderFactory.createTitledBorder("list of the products")); // create the border to panel product list
		// create table model 
				Object[] column = {"id","catogary","product","price","quantity","amount","amount(tax)"};
				//initialize
				modelTable = new DefaultTableModel();
				modelTable.setColumnIdentifiers(column);
				
				tbldisplay = new JTable();
				tbldisplay.setModel(modelTable);
				
				pane = new JScrollPane(tbldisplay);
				pane.setPreferredSize(new Dimension(400,300));
				p_list_product.add(pane);
		
		
		
	}// end constructor
	
	public static void main(String agrs[]) //create the main method
	{
		AKIYA pt =new AKIYA(); // call and create the constructor object
		pt.setTitle("AKIYA Inventory System"); // set the title frame
		pt.setSize(800, 650); // set the frame size
		pt.setVisible(true); // visible the frame to use can see
		pt.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE); // set use can close from the frame the program
		pt.setLocationRelativeTo(null); // set the frame will be center when starting run
		
		
	}//end main method

}//end class
